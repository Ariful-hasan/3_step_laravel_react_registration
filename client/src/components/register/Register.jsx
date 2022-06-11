import {Card,Form} from 'react-bootstrap';
import {useContext, useState, useEffect} from 'react';
import RegisterContext from '../contexts/RegisterContext';
import RegisterStepOne from '../register/RegisterStepOne';
import RegisterStepTwo from '../register/RegisterStepTwo';
import RegisterStepThree from '../register/RegisterStepThree';
import Success from '../register/Success';
import {formValidation, getRegisterFormStepName} from '../config/helpers';
import Axios from '../api/Axios';
import { 
    REGISTER_INFO, REGISTER_ADDRESS, 
    REGISTER_CREDENTIALS, REGISTER_SUBMIT,
    REGISTER_INFO_FIELDS, REGISTER_ADDRESS_FIELDS, REGISTER_CREDENTIALS_FIELDS
} from '../config/constants';

const Register = () => {
    
    const {FormData} = useContext(RegisterContext);
    const [error, setError] = useState("");
    const [registerForm, setRegisterForm] = useState("");
    const [success, setSuccess] = useState("");

    useEffect(() => {
        setRegisterForm(showRegisterForm());
    }, []);


    const handleButton = (currentStep, nextStep, stateData) => {
        let error = "";
        // console.log(stateData);
        if (nextStep === REGISTER_ADDRESS) {
            error  = formValidation(stateData, REGISTER_INFO_FIELDS);
        } else if (nextStep === REGISTER_CREDENTIALS) {
            error  = formValidation(stateData, REGISTER_ADDRESS_FIELDS);
        } else if (nextStep === REGISTER_SUBMIT) {
            error  = formValidation(stateData, REGISTER_CREDENTIALS_FIELDS);
            // console.log(nextStep);
            if (error === "") {
                handleSubmit(stateData);
            }
        }

        setError(error);

        if (error === "" && nextStep !== REGISTER_SUBMIT) {
            setRegisterForm(showRegisterForm(nextStep));
        }
    };

    const handleSubmit = (data) => {
        let res = "Welcome to Wunder Mobility.";
        //let res = Axios("post", "register", data);
        setSuccess("Registration Successfull.");
        setRegisterForm(<Success msg={res}/>);
    };

    const handlePrevBtn = (prevStep, currentStep) => {
        setRegisterForm(showRegisterForm(prevStep));
    };

    const showRegisterForm = (stepNo = null) => {
        let formNo = stepNo !== null ? stepNo : getRegisterFormStepName(FormData);
        
        switch (formNo) {
            case REGISTER_INFO:
                return <RegisterStepOne handleButton={handleButton} />;
            
            case REGISTER_ADDRESS:
                return <RegisterStepTwo handleButton={handleButton} handlePrevBtn={handlePrevBtn}/>;

            case REGISTER_CREDENTIALS:
                return <RegisterStepThree handleButton={handleButton} handlePrevBtn={handlePrevBtn} />;

            default:
                return "";         
          }
    };

  return (
      <div className='p-5'>
          <Card border={success ? "info" : "dark"} className="mb-2">
              <Card.Body>
                  <Card.Title>{success ?? "Register Form"}</Card.Title>
                  {error !== "" ? (<div><p className='text-danger font-weight-bold'>{error}</p></div>) : ""}
                  <Form>
                      {registerForm}
                  </Form>
              </Card.Body>
          </Card>
      </div>
  )
}

export default Register