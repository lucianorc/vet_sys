function handleAction(target) {
  const action = target.getAttribute('action')
  const customer_id = target.getAttribute('customer-id')

  const requests = {
    view: () => {
      return axios({
        method: 'get',
        url: '/customers/view/' + customer_id
      }).then( r => {
        return r.data
      }).catch( err => {
        console.log('Error', err.message)
      })
    },
    delete: () => {
      return axios({
        method: 'delete',
        url: '/customers/delete',
        params: {
          id: customer_id
        }
      }).then( r => {
        location.reload()
      }).catch( err => {
        console.log(err.message)
      })
    },
    pets: () => {
      return axios({
        method: 'get',
        url: '/customers/pets/' + customer_id,
      }).then( r => {
        return r.data
      }).catch( err => {
        console.log('Error', err.message)
      })
    }
  }

  return requests[action]()
}