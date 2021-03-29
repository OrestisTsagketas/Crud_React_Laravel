import React, { useState, useEffect, useRef } from 'react';
import "./app.css";
import { Input,Button } from 'reactstrap';

const Queque = ({ question_id, edit }) => {

    const [choices, setChoices] = useState([])
    const [changed, setChanged] = useState([])
    const radiosWrapper = useRef()

    useEffect(() => {
        getChoices()
    }, [])

    const getChoices = async () => {
        const response = await axios.get(`http://localhost:8000/api/Answer/${question_id}/show`)
        setChoices(response.data.posts)
    }
    const SaveMe = async (id) => {
        const response = await axios.post(`http://localhost:8000/api/Answer/${id}/${changed}/edit`).then(alert("Record Saved"))
    }
    const renderChoices = () => {
        if (!edit) {
            // console.log(choices) an thelei na einai monadiko to radio vazw onoma
            return choices && choices.map(({ id, title }) => {
                return (
                    <div className="control" ref={radiosWrapper} key={id} >
                        <label className="radio has-background-light" >
                            <input type="radio" value={title} />
                            {title}
                        </label>
                    </div>
                )
            })
        } else {
            return choices && choices.map(({ id, title, question_id }) => {
                return (
                    <div className="input-group" key={id}>
                        <Input id={id} placeholder={title} onChange={() => setChanged(event.target.value)} />
                        <span className="input-group-btn">
                            <Button outline color="success" onClick={() => SaveMe(id)}>Save</Button>
                        </span>
                    </div>
                )
            })

        }

    }
    return (
        <div>
            {renderChoices()}
        </div>
    );
}

export default Queque;