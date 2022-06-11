import React, {createContext, useState, useEffect} from 'react';
import {LOCALSTORAGE_REGISTER} from '../config/constants';

const RegisterContext = createContext();

export const RegisterProvider = ({children}) => {

    const [FormData, setFormData] = useState({
        "first_name" : "",
        "last_name" : "",
        "telephone" : "",

        "street" : "",
        "house_no" : "",
        "zip" : "",
        "city" : "",

        "account" : "",
        "iban" : "",
    });

    useEffect(() => {
        // localStorage.clear();
        let localData = JSON.parse(localStorage.getItem(LOCALSTORAGE_REGISTER));
        if (localData) {
            setFormData(localData);
        }
      }, []);

    const handleFormData = (key, value) => {
        setFormData( prevState => {
            let temp = { ...prevState };
            temp[key] = value;
            localStorage.setItem(LOCALSTORAGE_REGISTER, JSON.stringify(temp));
            return temp;
        });
    };

  return (
      <RegisterContext.Provider value={{ FormData, setFormData, handleFormData }}>
          {children}
      </RegisterContext.Provider>
  )
}

export default RegisterContext