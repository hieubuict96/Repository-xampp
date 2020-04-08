var listtt;


class Increment2 extends React.Component{
    constructor(props){
        super(props)
       
        this.state = {
            abc: "block"
        }
        listtt = this
        this.ham2 = this.ham2.bind(this)
    }

   
    render(){
        return(
            <div>
                toi thich hoc lap trinh
            </div> 
        )
    }
}

class Increment extends React.Component{
   

    render(){
        return(
            <div style={{display: listtt.state.abc}}>
                gahl
            </div> 
        )
    }
}


ReactDOM.render(
    <Increment />,
    document.getElementById("root")
)
