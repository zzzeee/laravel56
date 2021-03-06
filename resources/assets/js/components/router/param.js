import React from "react";
import { BrowserRouter as Router, Route, Link } from "react-router-dom";

const ParamsExample = () => (
  <Router>
    <div>
      <h2>Accounts</h2>
      <ul>
        <li>
          <Link to="/mobile/netflix">Netflix</Link>
        </li>
        <li>
          <Link to="/mobile/zillow-group">Zillow Group</Link>
        </li>
        <li>
          <Link to="/mobile/yahoo">Yahoo</Link>
        </li>
        <li>
          <Link to="/mobile/modus-create">Modus Create</Link>
        </li>
      </ul>
      <Route path="/mobile/:id" component={Child} />
        <hr />

      {/*
         It's possible to use regular expressions to control what param values should be matched.
            * "/order/asc"  - matched
            * "/order/desc" - matched
            * "/order/foo"  - not matched
      */}
      <ul>
        <li>
          <Link to="/mobile/order/asc">asc</Link>
        </li>
        <li>
          <Link to="/mobile/order/desc">desc</Link>
        </li>
        <li>
          <Link to="/mobile/order/foo">foo</Link>
        </li>
      </ul>
      
      <Route
        path="/mobile/order/:direction(asc|desc)"
        component={ComponentWithRegex}
      />
      <hr />
    </div>
  </Router>
);

const Child = ({ match }) => (
  <div>
    <h3>ID: {match.params.id}</h3>
  </div>
);

const ComponentWithRegex = ({ match }) => (
  <div>
    <h3>Only asc/desc are allowed: {match.params.direction}</h3>
  </div>
);

export default ParamsExample;