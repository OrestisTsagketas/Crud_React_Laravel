import React from "react";
import { Link } from "react-router-dom";
import { Jumbotron} from "reactstrap";
import QuestionnaireTable from "./QuestionnaireTable";

class dashboard extends React.Component {

    render() {
        return (
            <div>
                <Jumbotron>
                    <h3 className="display-3" >Welcome, to Questionnaireland!!!!</h3>
                    <p className="lead" >Very simple page that allows you to take and share questionnaires </p>
                    <hr className="my-2" />
                    <p> Pick, create, edit or even delete a Questionnaire!</p>
                    <p className="lead" >
                        <Link to="/AddTitle" className="btn btn-primary">Create Questionnaire</Link>
                    </p>
                </Jumbotron>
                <QuestionnaireTable/>
            </div >
        )
    }
}

export default dashboard;
