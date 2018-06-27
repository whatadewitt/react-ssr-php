import React from "react";
import { StaticRouter } from "react-router-dom";
import App from "./App";

const ServerApp = ({ location, data }) => (
  <StaticRouter location={location}>
    <App {...data} />
  </StaticRouter>
);

export default ServerApp;
