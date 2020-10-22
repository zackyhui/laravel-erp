import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import { Table } from "react-bootstrap";


class List extends Component {
    constructor(props) {
        super(props);
        this.state = {
            items: [],
            isLoaded: false,
            source: 'initialize from constructor'
        }

    }

    componentDidMount() {
        fetch('http://laravel-erp/api/students')
            .then(res => res.json())
            .then(json => {
                this.setState({
                    isLoaded: true,
                    items: json.data,
                    source: 'call success from api'
                })
                console.table(json.data);
            });
    }

    render() {
        var { isLoaded, items, source } = this.state;

        if (!isLoaded) {
            console.log({isLoaded, source});
            console.log({items });
            return <div> Loading...</div>
        }
        else {
            console.log({isLoaded, source});
            console.log({items});
            return (
                <div>
                    <div class="title m-b-md">
                    Student List in React
                    </div>
                    <Table striped bordered hover>
                    <thead className="thead-dark">
                        <tr>
                        <th>SID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Class</th>
                        </tr>
                    </thead>
                    <tbody>
                        { items.map((item, index) => (
                        <tr key={index}>
                        <td> { item.id } </td>
                        <td> { item.name } </td>
                        <td> { item.age } </td>
                        <td> { item.class } </td>
                        </tr>)) }
                    </tbody>
                    </Table>
                </div>
            );
        }
    }
}

export default List;

if (document.getElementById('list')) {
    ReactDOM.render(
            <List />,
        document.getElementById('list')
    );
}
