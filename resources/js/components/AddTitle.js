import axios from "axios";
import React from "react";
import { Button, Form, FormGroup, Label, Input } from "reactstrap";

class AddTitle extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            title: "",
            id: "",
        };
    }

    handleTitleChanged(event) {
        this.setState({ title: event.target.value });
    }

    handleButtonClicked(e) {
        if (this.state.title) {
            e.preventDefault();

            axios
                .post(
                    `http://localhost:8000/api/Questionnaire/${this.state.title}/create`, {}
                )
                .then(function (response) {
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });

            window.location.href = `/QuestionForm/:${this.state.title}`;

        } else {
            alert("Name the Questionnaire pls!!!");
        }
    }

    render() {
        return (<div>
            < Form >
                <FormGroup >
                    <Label for="questionnaire_title"> Questionnaire Name </Label>{" "} <Input type="text"
                        value={this.state.title}
                        onChange={this.handleTitleChanged.bind(this)}
                        placeholder="Enter the title here" />
                    <Button color="success" onClick={this.handleButtonClicked.bind(this)} >Create Questionnaire </Button>
                </FormGroup>
            </Form>
        </div>
        );
    }
}

export default AddTitle;
