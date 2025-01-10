<?php
// Copyright 1999-2024. WebPros International GmbH. All rights reserved.

namespace Webpros\WptkWpPlugin\WpToolkit\Waf;

use Patchstack\Processor;
use Webpros\WptkWpPlugin\WpToolkit\Common\WordPressHelper;
use Webpros\WptkWpPlugin\WpToolkit\Waf\Extensions\HttpRequestExtension;
use Webpros\WptkWpPlugin\WpToolkit\Waf\RulesConverter\PatchstackRuleConverter;

final class FirewallEngine
{
    const ENGINE_PATCHSTACK = 'fw-engine';

    const OPTION_ACTIVE_RULES = 'wp-toolkit_waf_active_rules';

    const OPTION_RULES = 'wp-toolkit_waf_rules';

    /**
     * @param string[] $vulnerabilityIds
     *
     * @return void
     */
    public static function deleteRules($vulnerabilityIds)
    {
        $groupedRules = (array)get_option(self::OPTION_RULES, []);

        foreach ($vulnerabilityIds as $vulnerabilityId) {
            unset($groupedRules[$vulnerabilityId]);
        }

        self::saveRules($groupedRules);
    }

    /**
     * @return bool
     */
    public static function launch($mustUsePluginCall = false)
    {
        $firewallRules = self::getFirewallRules();

        if (\count($firewallRules) === 0) {
            return true;
        }

        $whitelistRules = [];
        $settings = [
            'mustUsePluginCall' => $mustUsePluginCall,
        ];

        $firewall = new Processor(
            new HttpRequestExtension(),
            $firewallRules,
            $whitelistRules,
            $settings
        );

        return $firewall->launch();
    }

    /**
     * @return string[]
     */
    public static function listActiveRules()
    {
        return \array_keys(self::getFirewallRules());
    }

    /**
     * @param array $rules
     *
     * @return void
     */
    public static function setRules($rules)
    {
        $groupedRules = self::groupByVulnerabilityId($rules);

        self::saveRules($groupedRules);
    }

    /**
     * @param array $rules
     *
     * @return void
     */
    public static function upsertRules($rules)
    {
        $currentRules = (array)get_option(self::OPTION_RULES, []);
        $groupedRules = self::groupByVulnerabilityId($rules);

        foreach ($groupedRules as $vulnerabilityId => $vulnerabilityRules) {
            $currentRules[$vulnerabilityId] = $vulnerabilityRules;
        }

        self::saveRules($currentRules);
    }

    /**
     * @param array $rule
     *
     * @return array
     */
    private static function convertRule($rule)
    {
        switch (self::getPreferredEngine()) {
            case self::ENGINE_PATCHSTACK:
                return PatchstackRuleConverter::convert($rule);
            default:
                return $rule;
        }
    }

    /**
     * @param array $groupedRules
     *
     * @return array
     */
    private static function filterActiveRules($groupedRules)
    {
        $activeRules = [];

        foreach ($groupedRules as $vulnerabilityId => $rules) {
            $filteredRules = self::filterRulesByPreferredEngine($rules);
            if (\count($filteredRules) > 0) {
                // We use first suitable rule for preferred engine
                $rule = \array_shift($filteredRules);
                $activeRules[$vulnerabilityId] = self::convertRule($rule);
            }
        }

        return $activeRules;
    }

    /**
     * @param array $rules
     *
     * @return array
     */
    private static function filterRulesByPreferredEngine($rules)
    {
        return \array_filter(
            $rules,
            static function ($r) {
                return $r['engine'] === self::getPreferredEngine();
            }
        );
    }

    /**
     * @return array
     */
    private static function getFirewallRules()
    {
        return (array)get_option(self::OPTION_ACTIVE_RULES, []);
    }

    /**
     * @return string
     */
    private static function getPreferredEngine()
    {
        return self::ENGINE_PATCHSTACK;
    }

    /**
     * @param array $rules
     *
     * @return array
     */
    private static function groupByVulnerabilityId($rules)
    {
        return \array_reduce(
            $rules,
            static function ($c, $r) {
                $c[$r['vulnerabilityId']][] = $r;

                return $c;
            },
            []
        );
    }

    /**
     * @param array $groupedRules
     *
     * @return void
     */
    private static function saveRules($groupedRules)
    {
        WordPressHelper::upsert_option(self::OPTION_RULES, $groupedRules);
        WordPressHelper::upsert_option(self::OPTION_ACTIVE_RULES, self::filterActiveRules($groupedRules));
    }
}
