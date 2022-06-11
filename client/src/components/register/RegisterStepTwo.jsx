import { Card, Form, Button, ButtonToolbar, ButtonGroup } from 'react-bootstrap';
import { useContext } from 'react';
import RegisterContext from '../contexts/RegisterContext';
import {REGISTER_ADDRESS, REGISTER_CREDENTIALS} from '../config/constants';

const RegisterStepTwo = ({ handleButton, handlePrevBtn }) => {

    const { handleFormData, FormData } = useContext(RegisterContext);

    return (

        <Card border='primary'>
            <Card.Body>
                <Card.Title>Step - 2</Card.Title>

                <Form.Group className="mb-3" controlId="formBasicStreet">
                    <Form.Label>Street</Form.Label>
                    <Form.Control value={FormData.street} onChange={e => handleFormData("street", e.target.value)} type="text" placeholder="Street" required />
                </Form.Group>

                <Form.Group className="mb-3" controlId="formBasicHouse">
                    <Form.Label>House No</Form.Label>
                    <Form.Control value={FormData.house_no} onChange={e => handleFormData("house_no", e.target.value)} type="text" placeholder="House No" required />
                </Form.Group>

                <Form.Group className="mb-3" controlId="formBasicZip">
                    <Form.Label>Zip</Form.Label>
                    <Form.Control value={FormData.zip} onChange={e => handleFormData("zip", e.target.value)} type="text" placeholder="Zip" required />
                </Form.Group>

                <Form.Group className="mb-3" controlId="formBasicCity">
                    <Form.Label>City</Form.Label>
                    <Form.Control value={FormData.city} onChange={e => handleFormData("city", e.target.value)} type="text" placeholder="City" required />
                </Form.Group>

                <ButtonToolbar aria-label="Toolbar with button groups">
                    <ButtonGroup aria-label="Third group" className='p-2'>
                        <Button variant="dark" type="button" className='mt-2' onClick={(e) => handlePrevBtn("info", "address")}>
                            Prev
                        </Button>

                    </ButtonGroup>
                    <ButtonGroup aria-label="Third group" className='p-2'>
                        <Button variant="dark" type="button" className='mt-2' onClick={(e) => handleButton(REGISTER_ADDRESS, REGISTER_CREDENTIALS, FormData)}>
                            Next
                        </Button>
                    </ButtonGroup>
                </ButtonToolbar>
            
            </Card.Body>
        </Card>

    )
}

export default RegisterStepTwo;