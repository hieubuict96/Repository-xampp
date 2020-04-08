var list;
function appear(){
    ReactDOM.render(<Component2/>, document.getElementById('roo'))
}

class Component1 extends React.Component{
    constructor(props){
        super(props)
        list = this
        this.state = {
            arr: []
        }
    }

    render(){
        return(
            <div>
                <div id='roo'></div>
                <button onClick={appear}>Thêm</button>
                {this.state.arr.map((value, key)=>{
                    return <p key={key}>{value}</p>
                })}
            </div>
        )
    }

    componentDidMount(){
        var that = this
        $.post('/getNotes', function(data){
            that.setState({arr: data})
        })
    }
}

class Component2 extends React.Component{
    constructor(props){
        super(props)
        this.submit = this.submit.bind(this)
    }

    submit(){
        $.post("/add", {note: this.refs.fill.value}, function(data){
            list.setState({arr: data})
        })
        ReactDOM.unmountComponentAtNode(document.getElementById('roo'))
    }

    render(){
        return(
            <div>
            <input type="text" ref="fill" placeholder="fill here" />
            <button onClick={this.submit}>submit</button>
            </div>
        )
    }
}

ReactDOM.render(
    <Component1 />,
    document.getElementById('root')
)
