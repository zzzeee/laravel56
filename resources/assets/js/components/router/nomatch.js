import React from "react";
import {
  BrowserRouter as Router,
  Route,
  Link,
  Switch,
  Redirect
} from "react-router-dom";

const NoMatchExample = () => (
  <Router>
    <div>
      <ul>
        <li>
          <Link to="/mobile">Home</Link>
        </li>
        <li>
          <Link to="/mobile/old-match">Old Match, to be redirected</Link>
        </li>
        <li>
          <Link to="/mobile/will-match">Will Match</Link>
        </li>
        <li>
          <Link to="/mobile/will-not-match">Will Not Match</Link>
        </li>
        <li>
          <Link to="/mobile/also/will/not/match">Also Will Not Match</Link>
        </li>
      </ul>
      <Switch>
        <Route path="/mobile" exact component={Home} />
        <Redirect from="/mobile/old-match" to="/mobile/will-match" />
        <Route path="/mobile/will-match" component={WillMatch} />
        <Route component={NoMatch} />
      </Switch>
    </div>
  </Router>
);

const Home = (props) => {
    console.log(props);
  return <p>
    A <code>&lt;Switch></code> renders the first child <code>&lt;Route></code>{" "}
    that matches. A <code>&lt;Route></code> with no <code>path</code> always
    matches.
  </p>
};

const WillMatch = () => <h3>Matched!</h3>;

const NoMatch = (props) => {
    console.log(props);
    var { location } = props;
  return <div>
    <h3>
      No match for <code>{location.pathname}</code>
    </h3>
  </div>;
};

export default NoMatchExample;