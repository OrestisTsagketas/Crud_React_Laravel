import React from "react";
import ReactDOM from "react-dom";
import { BrowserRouter, Route, Switch } from "react-router-dom";
import dashboard from "./dashboard";
import AddTitle from "./AddTitle";
import QuestionForm from "./QuestionForm";
import QuestionnaireTable from "./QuestionnaireTable";
import Questions from "./Questions";

import 'bulma/css/bulma.min.css';


function Root() {
    return (
        <BrowserRouter>
        <Switch>
            <Route path="/" exact component={dashboard} />
            <Route path="/AddTitle" exact component={AddTitle}/> 
            <Route path="/QuestionForm/:id" exact component={QuestionForm}/>
            <Route path="/QuestionnaireTable" exact component={QuestionnaireTable}/>
            <Route path="/Questions/:id/:bool" exact component={Questions}/>
            </Switch>
        </BrowserRouter>
    );
}

export default Root;

if (document.getElementById("root")) {
                ReactDOM.render(<Root/>, document.getElementById("root"));
}
