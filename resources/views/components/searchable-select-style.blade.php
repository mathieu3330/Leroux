<style>
.content{
  display: none;
  padding: 20px;
  background: #fff;
  border-radius: 7px;
  box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}
.wrapper.active .content{
  position: absolute;
  display: block;
}
.content .options{
  max-height: 250px;
  overflow-y: auto;
  padding-right: 7px;
}
.options::-webkit-scrollbar{
  width: 7px;
}
.options::-webkit-scrollbar-track{
  background: #f1f1f1;
  border-radius: 25px;
}
.options::-webkit-scrollbar-thumb{
  background: #ccc;
  border-radius: 25px;
}
.options::-webkit-scrollbar-thumb:hover{
  background: #b3b3b3;
}
.options li{
  height: 50px;
  padding: 0 13px;
}
.options li:hover, li.selected{
  border-radius: 5px;
  background: #f2f2f2;
}
</style>