var bridge = function (leafPath) {
    window.rhubarb.viewBridgeClasses.ViewBridge.apply(this, arguments);
}

bridge.prototype = new window.rhubarb.viewBridgeClasses.ViewBridge();
bridge.prototype.constructor = bridge;

bridge.prototype.attachEvents = function () {
    //  Uses Rhubarb Button buttonPressed Event
    var buttonViewBridge = this.findChildViewBridge('AddSerial'),
        self = this;

    buttonViewBridge.attachClientEventHandler('OnButtonPressed', function () {
       alert('I just clicked this button');
    });

    buttonViewBridge.attachClientEventHandler('ButtonPressCompleted', function () {
        alert('Hello James from Ajax Land');
    });

    //  Custom Ajax Event
    document.getElementById("james").onclick = function (event) {
        //self is this asset item viewbridge which extends ViewBridge
        self.raiseServerEvent("test", "this is a magic string", function (response) {
            alert(response);
        });
    };
};

window.rhubarb.viewBridgeClasses.AssetItemViewBridge = bridge;