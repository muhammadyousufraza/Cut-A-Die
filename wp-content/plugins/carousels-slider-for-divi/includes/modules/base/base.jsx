import React from "react";


const applyCss = (cssObject, css, classes, lastEdited, hoverEnabled = "") => {
  css.push([
    {
      selector: classes.desktop,
      declaration: cssObject.desktop,
    },
  ]);

  if ("on|tablet" === lastEdited) {
    css.push([
      {
        selector: classes.desktop,
        declaration: cssObject.tablet,
        device: "tablet",
      },
    ]);
  } else if ("on|phone" === lastEdited) {
    css.push([
      {
        selector: classes.desktop,
        declaration: cssObject.phone,
        device: "phone",
      },
    ]);
  } else if (classes.hover && cssObject.hover && "on|hover" === hoverEnabled) {
    css.push([
      {
        selector: classes.hover,
        declaration: cssObject.hover,
      },
    ]);
  }
  return;
};

const applyCustomSpacing = (props, property, css_selector, css_property) => {
  var css = [];
  var important = true;

  const responsive_active =
    props[property + "_last_edited"] &&
    props[property + "_last_edited"].startsWith("on");

  var declaration_desktop = "";
  var declaration_tablet = "";
  var declaration_phone = "";
  const is_important = important ? "!important" : "";

  switch (css_property) {
    case "margin":
    case "padding":
      if (props[property]) {
        var values = props[property].split("|");
        declaration_desktop = `${css_property}-top: ${values[0]}${is_important};
        ${css_property}-right: ${
          values[1]
        }${is_important};
        ${css_property}-bottom: ${
          values[2]
        }${is_important};
        ${css_property}-left: ${
          values[3]
        }${is_important};`;
      }

      if (responsive_active && props[property + "_tablet"]) {
        var tablet_values = props[property + "_tablet"].split("|");
        declaration_tablet = `${css_property}-top: ${
          tablet_values[0]
        }${is_important};
        ${css_property}-right: ${
          tablet_values[1]
        }${is_important};
        ${css_property}-bottom: ${
          tablet_values[2]
        }${is_important};
        ${css_property}-left: ${
          tablet_values[3]
        }${is_important};`;
      }

      if (responsive_active && props[property + "_phone"]) {
        var phone_values = props[property + "_phone"].split("|");
        declaration_phone = `${css_property}-top: ${
          phone_values[0]
        }${is_important};
        ${css_property}-right: ${
          phone_values[1]
        }${is_important};
        ${css_property}-bottom: ${
          phone_values[2]
        }${is_important};
        ${css_property}-left: ${
          phone_values[3]
        }${is_important};`;
      }
      break;
    default:
      //Default is applied for values like height, color etc.
      declaration_desktop = `${css_property}: ${
        props[property]
      }${is_important};`;
      declaration_tablet = `${css_property}: ${
        props[property + "_tablet"]
      }${is_important};`;
      declaration_phone = `${css_property}: ${
        props[property + "_phone"]
      }${is_important};`;
  }

  css.push({
    selector: css_selector,
    declaration: declaration_desktop
  });

  if (props[property + "_tablet"] && responsive_active) {
    css.push({
      selector: css_selector,
      declaration: declaration_tablet,
      device: "tablet"
    });
  }

  if (props[property + "_phone"] && responsive_active) {
    css.push({
      selector: css_selector,
      declaration: declaration_phone,
      device: "phone"
    });
  }

  return css;


};

const applyBgCss = (css, props, backgroundObject) => {
  const {
    slug,
    use_color_gradient_slug,
    gradient,
    css_property,
  } = backgroundObject;
  let bg_style = "";
  let bg_style_tablet = "";
  let bg_style_phone = "";
  let bg_style_hover = "";
  let has_bg_gradient = null;
  let gradient_bg = "";
  let gradient_bg_tablet = "";
  let gradient_bg_phone = "";
  let gradient_bg_hover = "";

  const use_color_gradient = use_color_gradient_slug || "off";
  const gradient_type = props[gradient.type] || "linear";
  const gradient_direction = props[gradient.direction] || "180deg";
  const gradient_radial = props[gradient.radial] || "center";
  const gradient_start = props[gradient.start] || "#2b87da";
  const gradient_start_tablet = props[`${gradient.start}_tablet`];
  const gradient_start_phone = props[`${gradient.start}_phone`];
  const gradient_start_hover = props[`${gradient.start}__hover`];

  const gradient_end = props[gradient.end] || "#29c4a9";
  const gradient_end_tablet = props[`${gradient.end}_tablet`];
  const gradient_end_phone = props[`${gradient.end}_phone`];
  const gradient_end_hover = props[`${gradient.end}__hover`];

  const gradient_start_position = props[gradient.start_position] || "0%";
  const gradient_end_position = props[gradient.end_position] || "100%";

  if (use_color_gradient === "on") {
    const direction =
      gradient_type === "linear"
        ? gradient_direction
        : `circle at ${gradient_radial}`;

    gradient_bg = `${gradient_type}-gradient(${direction}, ${gradient_start} ${gradient_start_position}, ${gradient_end} ${gradient_end_position})`;
    gradient_bg_tablet = `${gradient_type}-gradient(${direction}, ${gradient_start_tablet} ${gradient_start_position}, ${gradient_end_tablet} ${gradient_end_position})`;
    gradient_bg_phone = `${gradient_type}-gradient(${direction}, ${gradient_start_phone} ${gradient_start_position}, ${gradient_end_phone} ${gradient_end_position})`;
    gradient_bg_hover = `${gradient_type}-gradient(${direction}, ${gradient_start_hover} ${gradient_start_position}, ${gradient_end_hover} ${gradient_end_position})`;

    has_bg_gradient = true;
  } else {
    has_bg_gradient = false;
  }

  if (gradient_bg !== "") {
    bg_style = `background-image: ${gradient_bg} !important;`;
    bg_style_tablet = `background-image: ${gradient_bg_tablet} !important;`;
    bg_style_phone = `background-image: ${gradient_bg_phone} !important;`;
    bg_style_hover = `background-image: ${gradient_bg_hover} !important;`;
  }

  if (!has_bg_gradient) {
    const bg_color = props[slug];
    const bg_color_tablet = props[`${slug}_tablet`];
    const bg_color_phone = props[`${slug}_phone`];
    const bg_color_hover = props[`${slug}__hover`];

    if (bg_color !== "") {
      bg_style = `background-color: ${bg_color} !important;`;
      bg_style_tablet = `background-color: ${bg_color_tablet} !important;`;
      bg_style_phone = `background-color: ${bg_color_phone} !important;`;
      bg_style_hover = `background-color: ${bg_color_hover} !important;`;
    }
  }

  css.push([
    {
      selector: css_property.desktop,
      declaration: bg_style,
    },
  ]);

  css.push([
    {
      selector: css_property.desktop,
      declaration: bg_style_tablet,
      device: "tablet",
    },
  ]);

  css.push([
    {
      selector: css_property.desktop,
      declaration: bg_style_phone,
      device: "phone",
    },
  ]);

  css.push([
    {
      selector: css_property.hover,
      declaration: bg_style_hover,
    },
  ]);

  return;
};

export {
  applyCss,
  applyCustomSpacing,
  applyBgCss,
};