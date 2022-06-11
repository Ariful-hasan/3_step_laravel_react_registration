import { Card, Form, Button, ButtonToolbar, ButtonGroup  } from 'react-bootstrap';
import { useContext } from 'react';
import RegisterContext from '../contexts/RegisterContext';
import {REGISTER_CREDENTIALS, REGISTER_SUBMIT} from '../config/constants';

const RegisterStepThree = ({ handleButton, handlePrevBtn }) => {

    const { handleFormData, FormData } = useContext(RegisterContext);

    return (

        <Card border='primary'>
            <Card.Body>
                <Card.Title>Step - 3</Card.Title>

                <Form.Group className="mb-3" controlId="formBasicAccount">
                    <Form.Label>Account</Form.Label>
                    <Form.Control value={FormData.account} onChange={e => handleFormData("account", e.target.value)} type="text" placeholder="Account" required />
                </Form.Group>

                <Form.Group className="mb-3" controlId="formBasicIBAN">
                    <Form.Label>IBAN</Form.Label>
                    <Form.Control value={FormData.iban} onChange={e => handleFormData("iban", e.target.value)} type="text" placeholder="IBAN" required />
                </Form.Group>

                

                <ButtonToolbar aria-label="Toolbar with button groups">
                    <ButtonGroup aria-label="Third group" className='p-2'>
                        <Button variant="dark" type="button" className='mt-2' onClick={(e) => handlePrevBtn("address", "credentials")}>
                            Prev
                        </Button>

                    </ButtonGroup>
                    <ButtonGroup aria-label="Third group" className='p-2'>
                        <Button variant="dark" type="button" className='mt-2' onClick={(e) => handleButton(REGISTER_CREDENTIALS, REGISTER_SUBMIT, FormData)}>
                            Register
                        </Button>
                    </ButtonGroup>
                </ButtonToolbar>

            </Card.Body>
        </Card>

    )
}

export default RegisterStepThree;