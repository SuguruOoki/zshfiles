JsOsaDAS1.001.00bplist00�Vscript_�function run(parameter) {
  var system = Application('System Events');
  var Terminal = Application('Terminal');
  var server = parameter[0];  
  Terminal.activate();
  delay(0.5);
  system.keystroke('n', {using: 'command down'});
  delay(0.5);
  system.keystroke('n', {using: 'command down'});
  delay(0.5);
  system.keystroke('n', {using: 'command down'});
  delay(0.5);
  var terW1 = Terminal.windows[1];
  var terW2 = Terminal.windows[2];
  var terW3 = Terminal.windows[3];
  
  delay(1);
  Terminal.doScript( 'sham ' + server, {in: terW1} );
  delay(3);
  Terminal.doScript( 'cd \"/home/apache2/logs/\"' , {in: terW1} );
  delay(1);
  Terminal.doScript( 'sham ' + server , {in: terW2} );
  delay(2);
  Terminal.doScript( 'cd \"/home/apache2/web/application/log\"' , {in: terW2} );
  delay(4);
  Terminal.doScript( 'sham ' + server , {in: terW3} );
  delay(4);
  Terminal.doScript( 'cd /var/log' , {in: terW3} )
  delay(1);
  
}                              �jscr  ��ޭ