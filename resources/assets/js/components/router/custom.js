import React from "react";
import { BrowserRouter as Router, Route, Link } from "react-router-dom";

class CustomLinkExample extends React.Component {
    render () {
        return (
            <Router>
                <div>
                    <OldSchoolMenuLink activeOnlyWhenExact={true} to="/mobile" label="Home" />
                    <OldSchoolMenuLink to="/mobile/about" label="About" />

                    <hr />
                    <Route exact path="/mobile" component={Home} />
                    <Route path="/mobile/about" component={About} />
                </div>
            </Router>
        );
    }
};

const OldSchoolMenuLink = ({ label, to, activeOnlyWhenExact }) => {
    console.log('to: ' + to + ', label: ' + label + ', active: ' + activeOnlyWhenExact);
    return (
        <Route
            path={to}
            exact={activeOnlyWhenExact}
            children={({ match }) => {
                console.log(match);
                return <div className={match ? "active" : ""}>
                    {match ? "> " : ""}
                    <Link to={to}>{label}</Link>
                </div>;
            }}
        />
    );
};


const Home = () => (
  <div>
    <h2>Home</h2>
  </div>
);

const About = () => (
  <div>
    <h2>About</h2>
  </div>
);

export default CustomLinkExample;