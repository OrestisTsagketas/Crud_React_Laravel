import React from "react";
import Container from "@material-ui/core/Container";
import TextField from "@material-ui/core/TextField";
import Button from "@material-ui/core/Button";
import axios from "axios";

class QuestionForm extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            title: "",
            values: [],
            counter: 1,
            questionnaire_id: "",
            questionnaire_title: this.props.match.params.id.substring(1),
            question_id: "",
        };
        this.handleSubmit = this.handleSubmit.bind(this);
        this.handleSubmit2 = this.handleSubmit2.bind(this);
    }

    componentDidMount() {
        axios
            .get(
                `http://localhost:8000/api/Questionnaire/${this.state.questionnaire_title}/get`
            )
            .then(response => {
                this.state.questionnaire_id = response.data.posts[0].id;
            });

    }

    createUI() {
        return this.state.values.map((el, i) => (
            <div key={i} >
                <TextField label={"Answer " + (i + 1)}
                    value={el || ""}
                    name="title1"
                    margin="normal"
                    variant="outlined"
                    autoComplete="off"
                    fullWidth onChange={this.handleChange.bind(this, i)}
                />
                <Button variant="contained" color="primary" onClick={this.removeClick.bind(this, i)} >Remove</Button>{" "}
            </div>
        ));
    }

    createUI2() {
        return this.state.values2.map((el, i) => (
            <div key={i}>
                <TextField label={"Answer " + (i + 1)} value={el || ""} name="title1" margin="normal" variant="outlined" autoComplete="off" fullWidth onChange={this.handleChange2.bind(this, i)} />
                <Button variant="contained" color="primary" onClick={this.removeClick2.bind(this, i)}> Remove </Button>
                <Button variant="contained" color="primary" onClick={this.addClick2.bind(this, i)}> Add Answer </Button>
            </div>
        ));
    }

    handleChange(i, event) {
        let values = [...this.state.values];
        values[i] = event.target.value;
        this.setState({ values });
    }

    addClick() {
        this.setState((prevState) => ({ values: [...prevState.values, ""] }));
    }

    removeClick(i) {
        let values = [...this.state.values];
        values.splice(i, 1);
        this.setState({ values });
    }

    getQuestionid(id) {
        this.setState({ question_id: id });
        alert(this.state.question_id);
    }

    handleSubmit(event) {


        event.preventDefault();
        if (this.state.title) {
            axios
                .post(
                    `http://localhost:8000/api/Question/${this.state.title}/${this.state.questionnaire_id}/create`, {}
                )
                .catch(function (error) {
                    console.log(error);
                });

            if (this.state.values.length > 0) {
                axios
                    .get(
                        `http://localhost:8000/api/Question/${this.state.title}/get`
                    )
                    .then(response => {
                        this.state.question_id = response.data.posts[0].id;
                        this.state.values.forEach((element) => axios
                            .post(
                                `http://localhost:8000/api/Answer/${element}/${this.state.question_id}/create`, {}
                            )
                            .catch(function (error) {
                                console.log(error);
                            })
                        );
                        var counter = this.state.counter;
                        counter = counter + 1;
                        this.setState({ counter: counter });
                        this.setState({
                            title: "",
                            values: [],
                            question_id: 1,
                        });  
                    });
            }
        }
        else {
            alert("Enter Question Title");
        }
    }

    handleSubmit2(event) {
        event.preventDefault();
        if (this.state.title) {
            axios
                .post(
                    `http://localhost:8000/api/Question/${this.state.title}/${this.state.questionnaire_id}/create`, {}
                )
                .catch(function (error) {
                    console.log(error);
                });

            if (this.state.values.length > 0) {
                axios
                    .get(
                        `http://localhost:8000/api/Question/${this.state.title}/get`
                    )
                    .then(response => {
                        this.state.question_id = response.data.posts[0].id;
                        this.state.values.forEach((element) => axios
                            .post(
                                `http://localhost:8000/api/Answer/${element}/${this.state.question_id}/create`, {}
                            )
                            .catch(function (error) {
                                console.log(error);
                            })
                        );
                        window.location.href = '/';  
                    });
            }
        }
        else {
            alert("Enter Question Title");
        }
        
    }

    handleSubmit3(event) {
        this.setState({ title: event.target.value });
        event.preventDefault();
    }

    render() {
        return (
            <Container maxWidth="xs" >
                <h3 style={{ textAlign: "center" }} > {" "} {"Question " + this.state.counter} {" "} </h3>
                <br />
                <TextField value={this.state.title} label="Question title" name="Question Title" variant="outlined" autoComplete="off" fullWidth onChange={this.handleSubmit3.bind(this)} />
                {this.createUI()}  <br />
                <Button variant="contained" color="primary" onClick={this.addClick.bind(this)} > Add Answer </Button>
                <br />
                <br />
                <Button variant="contained" color="primary" onClick={this.handleSubmit} fullWidth> Next Question </Button>
                <br />
                <br />
                <Button variant="contained" color="primary" onClick={this.handleSubmit2} color="#388e3c" fullWidth >Submit</Button>
                <br />
            </Container>
        );
    }
}

export default QuestionForm;
