import React, { useState, useEffect } from 'react'
import axios from 'axios'
import "./app.css";
import Question from './Question';
import { useParams } from 'react-router-dom';
import { Link } from 'react-router-dom';


const Questions = () => {
    const id = useParams().id.substring(1);
    const bool = useParams().bool.substring(1);
    const [questions, setQuestions] = useState([])
    
    

    useEffect(() => {
        getData()
    }, [])

    const getData = async () => {

        const response = await axios.get(`http://localhost:8000/api/Question/${id}/show`)
        setQuestions(response.data)
    }

    const renderBody = () => {
        return questions && questions.map(({ id, title }) => {
            return (
                <div key={id}>
                    <Question key={id} question={title} question_id={id} edit={bool}/>
                    <br></br>
                </div>
            )
        })
    }


    return (
        <>
            <>
            {renderBody()}
            </>
            <Link to={'/'}  className='button is-link is-medium is-fullwidth mt-4'>Finished</Link>
        </>
    )
}


export default Questions;