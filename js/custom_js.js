//navbar에서 현재 페이지인 해당 메뉴의 color를 변경함.

var v_url = window.location.href;

if (v_url.match('Pt') || v_url.match('recipe') || v_url.match('list'))
{
    $("#liPaste").addClass('show');
} 
else if(v_url.match('lab')) 
{
    $("#liLabpowder").addClass('show');
} 
else if(v_url.match('Mass')) 
{
    $("#liMasspowder").addClass('show');
} 
else if(v_url.match('users') || v_url.match('login'))
{
    $("#liAdmin").addClass('show');
}