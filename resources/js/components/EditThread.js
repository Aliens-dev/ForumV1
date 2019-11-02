import React from 'react';
import ReactDOM from 'react-dom';
import { Editor } from '@tinymce/tinymce-react';
import axios from 'axios';

class EditThread extends React.Component {

    constructor(props){
        super(props)
        this.state = {
            cont : '',
            title : '',
            message : '',
            classname : '',
        };
        this.token = document.getElementsByName('_token')[0].content;
        this.handleEditorChange = this.handleEditorChange.bind(this);
        this.EditThread = this.EditThread.bind(this);
        this.fetchData = this.fetchData.bind(this);
    }

    componentDidMount() {
        this.fetchData();
    }
    fetchData (){
        let str = window.location.href.replace('edit','editPost');
        axios.post(str,'',{
            headers: {
                "Content-Type" : "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": this.token,
            }
        }).then( (res)=> {
            if(res.data.success){
                this.setState({
                    cont : res.data.cont,
                    title : res.data.title,
                });
            }else {
                this.setState({
                    message : res.data.message,
                    classname : 'alert alert-danger',
                });
            }
        }).catch( (err)=>{
            alert(err)
        })

    }
    handleEditorChange (e){
        this.setState({
            cont : e.target.getContent(),
        });
    }
    EditThread () {
        if(this.state.cont === '' || this.state.title===''){
            alert('Please Fill the necessary fields!')
        }else {
            axios.post(window.location.href,{
                cont : this.state.cont,
                title : this.state.title,
            },{
                headers: {
                    "Content-Type" : "application/json",
                    "Accept": "application/json, text-plain, */*",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": this.token,
                }
            }).then( (res)=> {
                if(res.data.success){
                    this.setState({
                        message : res.data.message,
                        classname : 'alert alert-success',
                    });
                }else {
                    this.setState({
                        message : res.data.message,
                        classname : 'alert alert-danger',
                    });
                }
            }).catch( (err)=>{
                alert(err)
            })
        }
    }

    render() {
        return (
            <div>
                <div className={ this.state.message === ''  ? 'd-none' : `d-block alert-dismissible fade show ${this.state.classname}`}>
                    {this.state.message}
                    <button type="button" className="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div>
                    <input
                        type="text"
                        className="form-control mb-2"
                        name="title"
                        placeholder="Thread title"
                        onChange={e=> this.setState({title : e.target.value})}
                        value={this.state.title}
                    />
                </div>
                <Editor
                    initialValue={this.state.cont}
                    init={{
                        height: 500,
                        menubar: false,
                        plugins: [
                            'advlist autolink lists link image charmap print preview anchor',
                            'searchreplace visualblocks code fullscreen',
                            'insertdatetime media table paste code help wordcount'
                        ],
                        toolbar:
                            'undo redo | formatselect | bold italic backcolor | \
                            alignleft aligncenter alignright alignjustify | \
                            bullist numlist outdent indent | removeformat | help'
                    }}
                    onChange={this.handleEditorChange}
                />
                <button onClick={this.EditThread} className="btn btn-success mt-2">Save</button>
            </div>
        );
    }
}

if(document.querySelector('#edit-thread')){
    ReactDOM.render(
        <EditThread/>,
        document.querySelector('#edit-thread')
    );
}