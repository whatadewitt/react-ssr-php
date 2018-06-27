import React from "react";
import { BrowserRouter } from "react-router-dom";
import App from "./App";

const props = window.PROPS;

const ClientApp = () => {
  const { data } = props || {};

  return (
    <BrowserRouter>
      <App {...data} />
    </BrowserRouter>
  );
};

export default ClientApp;
