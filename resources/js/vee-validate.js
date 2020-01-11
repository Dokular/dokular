import { extend, localize } from "vee-validate";
import * as rules from "vee-validate/dist/rules";
import en from "vee-validate/dist/locale/en.json";

// Install rules
// extend("required", required);
// extend("min", min);
// extend("email", email);
// extend("phone", phone);

Object.keys(rules).forEach(rule => {
    extend(rule, rules[rule]);
});

// Install messages
localize({
  en
});
