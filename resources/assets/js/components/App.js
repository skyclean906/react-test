import React from 'react';
import { BrowserRouter } from 'react-router-dom'

import Header from './Header'
import Main from './Main'

class App extends React.Component {
  render() {
    return (
      <div style={{width: '100%', height: '100%'}}>
          <Header fileindex={this.props.fileindex} />
          <Main filename={this.props.filename} fileext={this.props.fileext}/>
      </div>
    )
  }
}
export default App
