import React from "react";
import { BrowserRouter as Router, Route, Link, Prompt } from "react-router-dom";

const PreventingTransitionsExample = () => (
  <Router basename="/mobile">
    <div>
      <ul>
        <li>
          <Link to="/">Form</Link>
        </li>
        <li>
          <Link to="/one">One</Link>
        </li>
        <li>
          <Link to="/two">Two</Link>
        </li>
      </ul>
      <hr />
      <Route path="/" exact component={Form} />
      <Route path="/one" render={() => {
        return (
            <div>
              <h3>One</h3>
              <Prompt
                  when={true}
                  message={location =>
                    `Are you sure you want to go to ${location.pathname}`
                  }
              />
            </div>
        );
      }} />
      <Route path="/two" render={() => {
          return (
              <div>
                <h3>Two</h3>
                <Prompt
                    when={true}
                    message={location =>
                      `Are you sure you want to go to ${location.pathname}`
                    }
                />
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
          when={false}
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