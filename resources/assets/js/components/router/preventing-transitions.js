import React from "react";
import { BrowserRouter as Router, Route, Link, Prompt } from "react-router-dom";

const PreventingTransitionsExample = () => (
  <Router>
    <div>
      <ul>
        <li>
          <Link to="/mobile">Form</Link>
        </li>
        <li>
          <Link to="/mobile/one">One</Link>
        </li>
        <li>
          <Link to="/mobile/two">Two</Link>
        </li>
      </ul>
      <Route path="/mobile" exact component={Form} />
      <Route path="/mobile/one" render={() => <h3>One</h3>} />
      <Route path="/mobile/two" render={() => {
          return (
              <div>
                <h3>Two</h3>
                {/* 一个页面只支持一个Prompt(提示)
                <Prompt
                    when={true}
                    message={location =>
                    `Are you sure you want to go to ${location.pathname}`
                    }
                /> */}
              </div>
          );
      }} />
    </div>
  </Router>
);

class Form extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
        isBlocking: false
    };
  }

  render() {
    const { isBlocking } = this.state;

    return (
      <form
        onSubmit={event => {
          event.preventDefault();
          event.target.reset();
          this.setState({
            isBlocking: false
          });
        }}
      >
        <Prompt
          when={isBlocking}
          message={location =>
            `Are you sure you want to go to ${location.pathname}`
          }
        />

        <p>
          Blocking?{" "}
          {isBlocking ? "Yes, click a link or the back button" : "Nope"}
        </p>

        <p>
          <input
            size="50"
            placeholder="type something to block transitions"
            onChange={event => {
              this.setState({
                isBlocking: event.target.value.length > 0
              });
            }}
          />
        </p>

        <p>
          <button>Submit to stop blocking</button>
        </p>
      </form>
    );
  }
}

export default PreventingTransitionsExample;