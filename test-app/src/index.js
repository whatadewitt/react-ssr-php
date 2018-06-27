import React from "react";
import ReactDOM from "react-dom";
import ReactDOMServer from "react-dom/server";
import "./index.css";
import ClientApp from "./ClientApp";
import ServerApp from "./ServerApp";

ReactDOM.render(<ClientApp />, document.getElementById("root"));

// For SSR
/**
if ("undefined" !== typeof document) {
  ReactDOM.hydrate(<ClientApp />, document.getElementById("root"));
}

global.React = React;
global.ReactDOM = React;
global.ReactDOMServer = ReactDOMServer;
global.ServerApp = ServerApp;
*/
