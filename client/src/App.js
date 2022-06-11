import {Container, Row, Col} from 'react-bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import Register from './components/register/Register';
import {RegisterProvider} from './components/contexts/RegisterContext';

function App() {
  return (
    <div>
      <Container fluid>
        <Row>
          <Col  xs={12} md={{ span: 6, offset: 3 }}>
            <RegisterProvider>
              <Register/>
            </RegisterProvider>
          </Col>
        </Row>
      </Container>
    </div>
  );
}

export default App;
