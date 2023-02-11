let arr = [1,3,5,9,13,22,27,35,46,51,55,83,87,23]

function insertionSort1(arr) {
    // Write your code here
    let keeper ;
    for(let i=arr.length-1;i>=0;i--){
        if( arr[i-1] > arr[i]){
            keeper = arr[i];
            arr[i] = arr[i-1];
        }else if(arr[i-1] > keeper){
            arr[i] = arr[i-1];
        }else if(arr[i-1]<keeper){
            arr[i] = keeper
        }else{
            continue
        }
        console.log(arr.join(' '));
    }
    
}

insertionSort1(arr);