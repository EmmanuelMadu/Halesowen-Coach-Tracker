function stop(Stopname,Lat,Long,num){
	this.name = Stopname;
	this.latitude = Lat;
	this.longitude = Long;
	this.stopNum = num;
}
Object.__defineGetter__.call(stop.prototype, "getLat", function(){
    return this.latitude;
});
Object.__defineGetter__.call(stop.prototype, "getLong", function(){
    return this.longitude;
});