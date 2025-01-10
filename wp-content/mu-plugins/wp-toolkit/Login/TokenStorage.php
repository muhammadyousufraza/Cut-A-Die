<?php
// Copyright 1999-2024. WebPros International GmbH. All rights reserved.

namespace Webpros\WptkWpPlugin\WpToolkit\Login;

use Webpros\WptkWpPlugin\WpToolkit\Common\WordPressHelper;

class TokenStorage
{
    const WP_OPTION_TOKEN_HASH = 'wp-toolkit_login_token_hash';
    const WP_OPTION_LOGIN = 'wp-toolkit_login_user';
    const WP_OPTION_TTL = 'wp-toolkit_login_ttl';

    /**
     * @var TokenGenerator
     */
    private $tokenGenerator;

    /**
     * @param TokenGenerator $tokenGenerator
     */
    public function __construct($tokenGenerator)
    {
        $this->tokenGenerator = $tokenGenerator;
    }

    /**
     * @param string $token
     * @param string $login
     * @param int $ttl
     * @return void
     */
    public function saveToken($token, $login, $ttl)
    {
        $tokenHash = $this->tokenGenerator->generateTokenHash($token);
        $tokenEndDate = $this->tokenGenerator->getTokenEndDate($ttl);

        WordPressHelper::upsert_option(self::WP_OPTION_TOKEN_HASH, $tokenHash);
        WordPressHelper::upsert_option(self::WP_OPTION_LOGIN, $login);
        WordPressHelper::upsert_option(self::WP_OPTION_TTL, $tokenEndDate);
    }

    /**
     * @return void
     */
    public function removeTokenData()
    {
        delete_option(self::WP_OPTION_TOKEN_HASH);
        delete_option(self::WP_OPTION_LOGIN);
        delete_option(self::WP_OPTION_TTL);
    }

    /**
     * @return string
     */
    public function getTokenHash()
    {
        return $this->getStringOption(self::WP_OPTION_TOKEN_HASH);
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->getStringOption(self::WP_OPTION_LOGIN);
    }

    /**
     * @return string
     */
    public function getTtl()
    {
        return $this->getStringOption(self::WP_OPTION_TTL);
    }

    /**
     * @param string $option
     * @return string
     */
    private function getStringOption($option)
    {
        $result = get_option($option);
        if (is_string($result)) {
            return $result;
        }

        return '';
    }
}
