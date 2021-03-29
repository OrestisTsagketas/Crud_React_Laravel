import React, { useState, useEffect } from 'react'
import axios from 'axios'
import { Table} from "reactstrap";
const URL = 'http://localhost:8000/api/Questionnaires/'


const QuestionnaireTable = () => {
    const [questionnaires, setQuestionnaires] = useState([])

    useEffect(() => {
        getData()
    }, [])

    const getData = async () => {

        const response = await axios.get(URL)
        setQuestionnaires(response.data)
    }

    const removeData = (id) => {
        axios.get(`http://localhost:8000/api/Questionnaire/${id}/delete`).then(res => {
            const del = questionnaires.filter(questionnaire => id !== questionnaire.id)
            setQuestionnaires(del)
        })
    }

    const renderHeader = () => {
        let headerElement = ['id', 'title', 'actions','to', 'perform']

        return headerElement.map((key, index) => {
            return <th key={index}>{key.toUpperCase()}</th>
        })
    }
    
    const takeData = (id)=>{
        window.location.href = `/Questions/:${id}/:${false}`;
    }

    const editData = (id)=>{
        window.location.href = `/Questions/:${id}/:${true}`;
    }

    const renderBody = () => {
        return questionnaires && questionnaires.map(({ id, title }) => {
            return (
                
                <tr key={id}>
                    <td>{id}</td>
                    <td>{title}</td>
                    <td><button className='button' onClick={() => takeData(id)}>Take it</button></td>
                    <td><button className='button' onClick={() => editData(id)}>Edit</button></td>
                    <td> <button className='button' onClick={() => removeData(id)}>Delete</button></td>
                </tr>
            )
        })
    }

    return (
        <>
            <Table>
                <thead>
                    <tr>{renderHeader()}</tr>
                </thead>
                <tbody>
                    {renderBody()}
                </tbody>
            </Table>
        </>
    )
}


export default QuestionnaireTable;