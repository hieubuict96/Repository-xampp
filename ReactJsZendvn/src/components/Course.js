import React, { Component } from 'react';
import Lesson from './Lesson';

class Course extends Component {
    constructor(props) {
        super(props);
        this.state = {
            isshowoutline: false,
            totalstudent: 69
        }
        this.handleClick3 = this.handleClick3.bind(this);
        this.register = this.register.bind(this);
        this.handletoogleoutline = this.handletoogleoutline.bind(this);
    }

    handleClick1() {
        alert('view 1');
    }

    handleClick2(content) {
        alert(content);
    }

    handleClick3() {
        alert(this.props.name);
    }

    register() {
        alert('đăng ký');
        console.log(this.refs.username.value);
    }

    handletoogleoutline(){
        this.setState({
            isshowoutline:!this.state.isshowoutline,
        })
    }

    showButtonFree (){
        const isFree = this.props.free;
        if (isFree) {
            return (
                    <div className="btn-group">
                        <button onClick={this.handleClick1} type="button" className="btn btn-warning">view 1</button>
                        <button onClick={() => this.handleClick2("view 2 123")} type="button" className="btn btn-danger">view 2</button>
                        <button onClick={this.handleClick3} type="button" className="btn btn-success">view 3</button>
                    </div>
            )
        } else {
            return(
                <div className="input-group">
                    <span className="input-group-btn">
                        <button onClick={this.register} className="btn btn-info" type="button">Register!</button>
                    </span>
                    <input type="text" className="form-control" placeholder="user name..." ref="username" />
                </div>
            )
        }
    }

    render() {
        let elmoutline = null;
        if(this.state.isshowoutline){
            elmoutline =  <ul className="list-group">
                            <Lesson />
                            <Lesson></Lesson>
                            <Lesson />
                        </ul>
        }
        return(
            <div className="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <div className="panel panel-info">
                    <div className="panel-heading">
                        <h3 className="panel-title">{this.props.name}</h3>
                    </div>
                    <div className="panel-body">
                        <p>{this.props.time}</p>
                        <p>{this.props.children}</p>
                        <p><button onClick={this.handletoogleoutline} className="btn btn-success" type="button">Toogle Outline</button></p>
                        {elmoutline}
                    </div>
                </div>
                <div className="panel-footer">
                {this.showButtonFree()}
                </div>
            </div>
        );
    }
}

export default Course;