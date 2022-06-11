import {
  REGISTER_INFO, REGISTER_ADDRESS,
  REGISTER_CREDENTIALS, REGISTER_INFO_FIELDS,
  REGISTER_ADDRESS_FIELDS, REGISTER_CREDENTIALS_FIELDS
} from './constants';

export const formValidation = (data, requiredFields) => {
  if (data !== null && requiredFields.length) {
    for (const field of requiredFields) {
      if (data.hasOwnProperty(field) && (data[field] === null || data[field] === "")) {
        return "Please fill required fields!";
      }
    }
  }
  return "";
}

export const getRegisterFormStepName = (data) => {
  if (typeof data === 'object' && data !== null) {
    for (const [key, value] of Object.entries(data)) {
      if (REGISTER_INFO_FIELDS.includes(key) && value === "") {
        return REGISTER_INFO;
      }
      else if (REGISTER_ADDRESS_FIELDS.includes(key) && value === "") {
        return REGISTER_ADDRESS;
      }
      else if (REGISTER_CREDENTIALS_FIELDS.includes(key)) {
        return REGISTER_CREDENTIALS;
      }
    }
  }
  return null;
};

