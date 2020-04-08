import React, { Component } from 'react';
import Course from './components/Course';
import './App.css';
import Lifecycle from './components/Lifecycle';



class App extends Component {
    
        render() {

            const items = [
                {
                    name: 'ReactJS',
                    time: '30h',
                    free: true,
                    desc: 'ReactJS is very simple!'
                },
                {
                    name: 'AngularJS',
                    time: '55h',
                    free: false
                },
                {
                    name: 'NodeJS',
                    time: '35h',
                    free: true
                }
            ];

        let elmCourses = items.map((item, index) =>
    <Course key={index} name={item.name} time={item.time} free={item.free}>{item.desc}</Course>
        );

        elmCourses = null;

        return (
            
            <div className="row">
               {elmCourses}
               <Lifecycle />
            </div>
        );
    }
}



export default App;

