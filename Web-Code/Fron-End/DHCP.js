const inputs = document.querySelectorAll('input');
inputs.forEach((input, index) => {
    input.addEventListener('keydown', (event) => {

        if (event.key === 'Enter') {
            event.preventDefault();

            if (index < inputs.length - 1) {
                inputs[index + 1].focus();78
            }
        }
    })
})

document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault();
    const dominName = document.querySelector('.domin-name input').value;
    const networkID = document.querySelector('.network input').value;
    const subnet = document.querySelector('.subnet input').value;
    const sRange = document.querySelector('.srange input').value;
    const eRange = document.querySelector('.erange input').value;
    const defaultRouter = document.querySelector('.def-router input').value;
    const optionSubnetMask = document.querySelector('.op-subnetmask input').value;
    const dns1 = document.querySelector('.inp1 input').value;
    const dns2 = document.querySelector('.inp2 input').value;
    const leasetime = document.querySelector('.leasetime input').value;

    const formData = {
        dominName,
        networkID,
        subnet,
        sRange,
        eRange,
        defaultRouter,
        optionSubnetMask,
        dns1,
        dns2, 
        leasetime
    };
    
    console.log('Save done:', formData);

    document.dominName = document.querySelector('.domin-name input').value = '';
    document.networkID = document.querySelector('.network input').value = '';
    document.subnet = document.querySelector('.subnet input').value = '';
    document.sRange = document.querySelector('.srange input').value = '';
    document.eRange = document.querySelector('.erange input').value = '';
    document.defaultRouter = document.querySelector('.def-router input').value = '';
    document.optionSubnetMask = document.querySelector('.op-subnetmask input').value = '';
    document.dns1 = document.querySelector('.inp1 input').value = '';
    document.dns2 = document.querySelector('.inp2 input').value = '';
    document.leasetime = document.querySelector('.leasetime input').value = '';
    
    alert('Saved successful');
    });


const serverName = document.querySelector('.server-name');

setTimeout(() => {
    serverName.classList.add('slide-out');
}, 3000);