import React from 'react'
import FileViewer from 'react-file-viewer';
class Main extends React.Component {
  render() {
    const filepath = '/upload/' + this.props.filename;
    console.log(this.props);
    return (
      <div className="main-view row">
      {this.props.filename != "" && <FileViewer
        fileType={this.props.fileext}
        filePath={filepath}
        onError={this.onError}/>}
      </div>
    )
  }

  onError(e) {
    console.log('error in fileviewer');
  }
}

export default Main
