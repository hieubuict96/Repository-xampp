import React, { Component } from 'react';

class Lifecycle extends Component {
    constructor(props) {
        super(props);
        this.state = {
            title: "Lifecycle"
        }
        this.handlechangetitle = this.handlechangetitle.bind(this);
        console.log("constructoc")
    }

    static getDerivedStateFromProps(){
        console.log("ComponentWillMount")
    }

    componentDidMount(){
        console.log("componentDidMount")
        this.setState({
            title: "LifecycleComponent-componentDidMount"
        })
    }

    handlechangetitle(){
        this.setState({
            title: "LifecycleComponent-handlechangetitle"
        })
    }
    

    render() {
        console.log("render")
        
        return(
            
                <div className="panel panel-danger">
                    <div className="panel-heading">
                        <h3 className="panel-title">{this.state.title}</h3>
                    </div>
                    <div className="panel-body"> 
                        <button onClick={this.handlechangetitle} className="btn btn-success" type="button">Toogle Outline</button>
                        
                    </div>
                </div>
        
        );
    }
}

export default Lifecycle;