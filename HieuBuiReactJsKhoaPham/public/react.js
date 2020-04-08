class Increment extends React.Component{

    constructor(props){
        super(props)
        this.state = {
            stt: 1
        }
        this.increment = this.increment.bind(this)
        this.img1 = this.img1.bind(this)
        this.img2 = this.img2.bind(this)
        this.autoo = this.autoo.bind(this)
        
    }

    increment(){
        this.setState({
            stt: this.state.stt+1
        })
    }
    
    img1(){
        if(this.state.stt>1){
            this.setState({
                stt: this.state.stt-1
            })
        }else{
            this.setState({
                stt: 7
            })
           
        }
    }

    img2(){  
        if(this.state.stt<=6){
            this.setState({
                stt: this.state.stt+1
            })
        }else{
            this.setState({
                stt: 1
            })  
        }
    }


    autoo(){
        setInterval(this.img2, 1000)
        }
    

    render(){
        return(
            <div>
                <img src={"images/"+this.state.stt+".jpg"} height="200px"></img>
                <hr className="hidden" />       
                <button type="button" onClick={this.autoo} >Continue</button>
              
            </div> 
        )
    }
}


ReactDOM.render(
    <Increment />,
    document.getElementById("root")
)

