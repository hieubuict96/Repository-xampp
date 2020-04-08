class Componentcha extends React.Component {
    constructor(props){
        super(props);
        this.ham1 = this.ham1.bind(this);
        this.ham2 = this.ham2.bind(this);
        this.state = {
            value : 20,
            name : "Bùi Đình Hiếu"
        }
    }

    ham1(){
        alert("bạn đã click thành công");
    }

    ham2(){
       this.setState({
           name: "Tôi cũng tên là Bùi Đình Hiếu"
       })
    }
    
   


    render(){
        return(
            <div>
            <p>My name is Hiếu</p>
            <Componentcon name="1" year="2">123</Componentcon>
            <button onClick={this.ham1}>Click Me</button>
            <button onClick={this.ham2}>Click change state</button>
            <br></br>
            {this.state.name}
            </div>
        )
    }
}

class Componentcon extends React.Component {
    render(){
        return(
            <div>
            <p>Tên tôi là Hiếu</p>
            {this.props.name}
            <br></br>
            {this.props.year}
            <br></br>
            {this.props.children}
            </div>
        )
    }
}

ReactDOM.render(
    <Componentcha />, 
    document.getElementById("root"));
