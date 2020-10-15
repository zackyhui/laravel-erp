import React, { Component } from "react";
import ReactDOM from 'react-dom';

import { Container, Row } from "react-bootstrap";
import { Button } from "react-bootstrap";




class Dashboard extends Component {
    render() {
        const dashboardStyle = {
            width: '200px',
            height: '200px',
            size: 'lg',
            justifyContent: 'center',
            margin: '10px'
        };
        console.log('i render');
        return (
            <div>
                <Container>
                    <Row className="justify-content-md-center">
                    <Button variant="primary" style={ dashboardStyle }>Primary</Button>{' '}
                    <Button variant="secondary" style={ dashboardStyle }>Secondary</Button>{' '}
                    <Button variant="success" style={ dashboardStyle }>Success</Button>{' '}
                    </Row>
                    <Row className="justify-content-md-center">
                    <Button variant="warning" style={ dashboardStyle }>Warning</Button>{' '}
                    <Button variant="danger" style={ dashboardStyle }>Danger</Button>
                    <Button variant="info" style={ dashboardStyle }>Info</Button>{' '}
                    </Row>
                    <Row className="justify-content-md-center">
                    <Button variant="light" style={ dashboardStyle }>Light</Button>
                    <Button variant="dark" style={ dashboardStyle }>Dark</Button>{' '}
                    <Button variant="link" style={ dashboardStyle }>Link</Button>
                    </Row>
                </Container>
            </div>
        );

    }
}


export default Dashboard;

if (document.getElementById('dashboard')) {
    ReactDOM.render(
            <Dashboard />,
        document.getElementById('dashboard')
    );
}
