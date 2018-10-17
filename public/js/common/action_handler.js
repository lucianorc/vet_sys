function handleAction(target) {
  const urls = {
    view: '/customers/view/'
  }

  const action = target.getAttribute('action')
  const customer_id = target.getAttribute('customer-id')
  let response

  if(Object.keys(urls).includes(action)) {
    url = 'http://localhost:8000' + urls.view + customer_id
    return axios.get(url).then( r => {
      return r.data
    }).catch( err => {
      console.log('Error', err.message)
    })
  } else {
    return 'sdnan'
  }
}