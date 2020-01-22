import React from 'react'
import { render } from 'react-dom'
import { BrowserRouter } from 'react-router-dom'
import App from './components/App';

const element = document.getElementById('app')
const props = Object.assign({}, element.dataset)
render((
    <BrowserRouter>
        <App {...props}/>
    </BrowserRouter>
), document.getElementById('app'));
