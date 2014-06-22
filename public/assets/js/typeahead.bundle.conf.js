var comics = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('comic'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  remote: 'search/%QUERY'
});

comics.initialize();

$('#comic_name').typeahead(null, {
  displayKey: 'comic',
  name: 'comic',
  source: comics.ttAdapter(),
  templates: {
    empty: [].join(),
    suggestion: Handlebars.compile("<img src=\"comics/{{comic}}/{{cover}}\" width=\"80px\" height\"120px\"> {{comic}}")
  }
});
