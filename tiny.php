<!DOCTYPE html>
<html>
<head>
  <script src='https://cloud.tinymce.com/5/tinymce.min.js?apiKey=your_API_key'></script>
  <script>
  tinymce.init({
    selector: '#mytextarea',
    plugin: 'a_tinymce_plugin',
    a_plugin_option: true,
    a_configuration_option: 400
  });
  </script>
</head>

<body>
<h1>TinyMCE Quick Start Guide</h1>
  <form method="post">
    <textarea id="mytextarea">Hello, World!</textarea>
  </form>
</body>
</html>
