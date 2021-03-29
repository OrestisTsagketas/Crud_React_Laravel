import React, { useState, useEffect, useRef } from 'react';
import "./app.css";
import Choice from "./Choices"
import { Label, Input, Button } from 'reactstrap';


const Question = ({ question, question_id, edit }) => {
  const [questionChanged, setQuestionChanged] = useState('');


  const SaveQuestion = async (id) => {
    const response = await axios.post(`http://localhost:8000/api/Question/${id}/${questionChanged}/edit`).then(alert("Record Saved"))
  }


  const renderCard = () => {
    if (edit == "true") {
      return (
        <div className="card" >
          <div className="card-content">
            <div className="content">
              <Label for="exampleEmail"><b>Question</b></Label>
              <div className="input-group">
                <Input type="email" id={question_id} placeholder={question} onChange={() => setQuestionChanged(event.target.value)} />
                <span className="input-group-btn">
                  <Button outline color="success" onClick={() => SaveQuestion(question_id)}>Save</Button>
                </span>
              </div>
              <br></br>
              <Label for="exampleEmail"><b>Choices</b></Label>
              <Choice question_id={question_id} edit={true} />
            </div>
          </div>
        </div>
      );
    } else {
      return (
        <div className="card">
          <div className="card-content">
            <div className="content">
              <h2 style={{ textAlign: 'center' }} className="mb-5">{question}</h2>
              <Choice question_id={question_id} edit={false} />
            </div>
          </div>
        </div>
      );
    }
  }

  return (
    <div>
      {renderCard()}
    </div>
  );
}

export default Question;