import React, { Component } from "react";
import ReactDOM from 'react-dom';


class MyCard extends Component {
  render() {
    return (
        <div>
        </div>
    );
  }
}

export default MyCard;

if (document.getElementById('example')) {
    ReactDOM.render(
        <MyCard />,
        document.getElementById('example')
    );
}
