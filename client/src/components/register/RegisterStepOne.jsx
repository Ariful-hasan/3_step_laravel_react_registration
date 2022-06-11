import { Card, Form, Button } from 'react-bootstrap';
import { useContext } from 'react';
import RegisterContext from '../contexts/RegisterContext';
import {REGISTER_INFO, REGISTER_ADDRESS} from '../config/constants';

const RegisterStepOne = ({ handleButton }) => {

    const { handleFormData, FormData } = useContext(RegisterContext);

    return (

        <Card border='primary'>
            <Card.Body>
                <Card.Title>Step - 1</Card.Title>

                <Form.Group className="mb-3" controlId="formBasicFirstName">
                    <Form.Label>First Name</Form.Label>
                    <Form.Control value={FormData.first_name} onChange={e => handleFormData("first_name", e.target.value)} type="text" placeholder="First Name" required />
                </Form.Group>

                <Form.Group className="mb-3" controlId="formBasicLastName">
                    <Form.Label>Last Name</Form.Label>
                    <Form.Control value={FormData.last_name} onChange={e => handleFormData("last_name", e.target.value)} type="text" placeholder="Last Name" required />
                </Form.Group>

                <Form.Group className="mb-3" controlId="formBasicLastName">
                    <Form.Label>Telephone</Form.Label>
                    <Form.Control value={FormData.telephone} onChange={e => handleFormData("telephone", e.target.value)} type="text" placeholder="Last Name" required />
                </Form.Group>

                <Button variant="dark" type="button" className='mt-2' onClick={(e) => handleButton(REGISTER_INFO, REGISTER_ADDRESS, FormData)}>
                    Next
                </Button>

            </Card.Body>
        </Card>

    )
}

export default RegisterStepOne