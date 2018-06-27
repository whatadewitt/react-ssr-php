import React, { Component } from "react";
import { Route } from "react-router-dom";
import "./App.css";
import Link from "./Link";
import Home from "./Home";
import About from "./About";
import Topics from "./Topics";

class App extends Component {
  constructor(props) {
    super(props);

    this.state = {
      about: this.props.about || null,
      topics: this.props.topics || null
    };
  }

  render() {
    return (
      <div>
        <ul>
          <li>
            <Link to="/">Home</Link>
          </li>
          <li>
            <Link to="/about">About</Link>
          </li>
          <li>
            <Link to="/topics">Topics</Link>
          </li>
        </ul>

        <hr />

        <Route exact path="/" render={props => <Home />} />
        <Route
          path="/about"
          render={props => <About content={this.state.about} />}
        />
        <Route
          path="/topics"
          render={props => <Topics content={this.state.topics} />}
        />
      </div>
    );
  }
}

export default App;
