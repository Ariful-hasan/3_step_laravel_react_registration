import { Card } from 'react-bootstrap';

const Success = ({msg}) => {
  return (
    <Card bg='info'>
        <Card.Body>
            <p>{msg}</p>
            </Card.Body>
    </Card>
  )
}

export default Success;